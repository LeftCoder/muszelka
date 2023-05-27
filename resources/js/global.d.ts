import { PageProps as InertiaPageProps } from '@inertiajs/core'
import { AxiosInstance } from 'axios'
import { PageProps as AppPageProps } from './types'
import { ReCaptchaInstance } from 'recaptcha-v3'

declare global {
  interface Window {
    captcha: ReCaptchaInstance
    axios: AxiosInstance
  }
}

declare module '@inertiajs/core' {
  interface PageProps extends InertiaPageProps, AppPageProps {}
}
