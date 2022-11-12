import { ReCaptchaInstance } from 'recaptcha-v3'
import { AxiosStatic } from 'axios'

declare global {
    interface Window { captcha: ReCaptchaInstance; axios: AxiosStatic }
}