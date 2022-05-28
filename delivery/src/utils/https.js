import axios from 'axios'
import {
    Toast
} from 'vant'

//创建一个axios对象
const http = axios.create({
    timeout: 5000
})

//设置请求的拦截器
http.interceptors.request.use(config => {
    // 在这里，可以配置请求头、token等信息
    return config
}, error => {
    console.log(error);
    return Promise.reject(error)
})


//设置响应的拦截器
http.interceptors.response.use(res => {
    //返回的响应数据
    const data = res.data
    if (res.status == 200) {
        if (data.code == 1001) {
            //data.status为true，就表示登录成功了
            return Promise.resolve(data)
        } else {
            //data.status为false，就表示登录失败了
            //弹窗提醒
            Toast.fail(data.message)
            return Promise.reject(data)
        }
    }
}, error => {
    if (error.response.status) {
        switch (error.response.status) {
            case 404:
                Toast.fail("请求路径找不到！")
                break;
            case 500:
                Toast.fail("服务器内部错误！")
                break;
            default:
                break;
        }
    }
    return Promise.reject(error)
})

export default http