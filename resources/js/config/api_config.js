import axios from 'axios'
const prod = true;
export const baseUrl = prod ? 'http://69.62.72.119:8075/api/v1/' : 'http://localhost:8000/api/v1/'

export default {
    execute(baseUrl, method, uri, data, params = {}) {
        const accessToken = localStorage.getItem('access_token')
        const client = axios.create({
            baseURL: baseUrl,
            json: true
        })
        return client({
            method,
            url: uri,
            data,
            params: params,
            headers: {
                Authorization: accessToken ? `Bearer ${accessToken}` : '',
                accessUsername: localStorage.getItem('accessUsername')
            }
        }).then((req) => req.data)
        .catch((error) => {
          if (error.response) {
            if (error.response.status === 422) {
              return Promise.reject({status: 422, errors: error.response.data.errors});
            }
            return Promise.reject({
              message: error.response.data.message || "Something went wrong!",
            });
          }
          if (error.request) {
            return Promise.reject({ message: "No response from server" });
          }

          return Promise.reject({ message: error.message });
        });
    },
    getData(baseUrl, uri, params = {}) {
        return this.execute(baseUrl, 'get', uri, {}, params)
    },
    postData(baseUrl, uri, data) {
        return this.execute(baseUrl, 'post', uri, data)
    },
    putData(baseUrl, uri, data) {
        return this.execute(baseUrl, 'put', uri, data)
    },
    deleteData(baseUrl, uri) {
        return this.execute(baseUrl, 'delete', uri)
    }
}
