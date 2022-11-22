<script>
import vueFilePond, { setOptions } from 'vue-filepond'
import pond_pl from '@/utils/pond_pl'
import 'filepond/dist/filepond.min.css'
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type'
import FilepondPluginImageResize from 'filepond-plugin-image-resize'
import FilePondPluginImageTransform from 'filepond-plugin-image-transform'

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilepondPluginImageResize,
  FilePondPluginImageTransform
)
const token = document.head.querySelector('meta[name="csrf_token"]')
setOptions({
  server: {
    url: '/dashboard/api/',
    headers: {
      'X-CSRF-TOKEN': token.content,
    },
    process: 'upload',
    revert: 'delete',
  },
  ...pond_pl,
})

export default {
  emits: ['update:modelValue'],
  components: { FilePond },
  data() {
    return {
      myFiles: [],
    }
  },
  methods: {
    handleAdd(error, file) {
      try {
        this.myFiles.push(file.serverId)
        this.$emit('update:modelValue', this.myFiles)
      } catch {
        console.error(error)
      }
    },
    handleRemove(error, file) {
      try {
        this.myFiles = this.myFiles.filter((f) => f !== file.serverId)
        this.$emit('update:modelValue', this.myFiles)
      } catch {
        console.error(error)
      }
    },
  },
}
</script>

<template>
  <FilePond
    name="image"
    class-name="hover:cursor-pointer"
    allow-multiple="true"
    accepted-file-types="image/*"
    imageResizeTargetWidth="1920"
    imageResizeTargetHeight="1280"
    imageResizeUpscale="false"
    imageTransformClientTransforms="resize"
    @processfile="handleAdd"
    @removefile="handleRemove"
  />
</template>
