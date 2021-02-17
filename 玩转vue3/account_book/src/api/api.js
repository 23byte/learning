import apiConfig from './api_router.js';
import axios from 'axios';
axios.default.baseUrl = '/admin/';
const obj = {};

for (let i in apiConfig) {
    let config = apiConfig[i];
    obj[i] = function(params) {
        return new Promise((resolve, reject) => {
            // 实现请求代码
            let opt = {
                method: config.method || 'get',
                url: config.url,
            };
            if (config.method == 'post') {
                opt.data = params;
            } else {
                opt.params = params;
            }
            axios(opt)
                .then((res) => {
                    if (res.data.code == 0) {
                        resolve(res.data);
                    } else {
                        console.log(res.data.msg);
                        reject(res.data);
                    }
                })
                .catch((error) => {
                    console.log(error);
                    // alert('网络遇到问题，请稍后再试')
                });
        });
    };
}

export default obj