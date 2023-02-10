const axiosCatch = (error) => {
    // handle error
    if (error.response) {
        // The request was made and the server responded with a status code
        // that falls out of the range of 2xx
        console.error(error.response.data);
        console.error(error.response.status);
        console.error(error.response.headers);
    } else if (error.request) {
        // The request was made but no response was received
        // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
        // http.ClientRequest in node.js
        console.error(error.request);
    } else {
        // Something happened in setting up the request that triggered an Error
        console.error('Error', error.message);
    }
    console.error(error.config);
    // if (error.response) {
    //     throw error.request.statusText;
    // } else if (error.request) {
    //     throw error.message;
    // } else {
    //     throw "opps! something went wrong while setting up request";
    // }
    // throw error.message;

}

const token = localStorage.getItem('token');
const GUEST = axios.create({
    headers: {
        'Content-Type': 'application/json',
    },
});
const SERVER = axios.create({
    baseURL: '/api',
    headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`
    },
});
const MESSAGE = {
    SUCCESS: (content = '', title = '') => {
        toastr.success(content, title);
    },
    INFO: (content = '', title = '') => {
        toastr.info(content, title);
    },
    WARN: (content = '', title = '') => {
        toastr.warning(content, title);
    },
    ERROR: (content = '', title = '') => {
        toastr.error(content, title);
    }
}

const API = {
    MEDIA: {
        MOVEFILE: async (data) => {
            try {
                let response = await SERVER.post('media/getImagePath', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Authorization': `Bearer ${token}`
                    }
                });
                return response.data;
            }catch (e){
                 throw e.response.data.message;
            }
        },
        DELETE: async (path) => {
            await SERVER.post('media/deleteImage', {path});
        }
    },
    CATEGORY: {
        CREATE: async () => {

        }
    },
    PRODUCT: {
        CREATE: async () => {},
        DELETE: async (productId) => {},
    },
    SETTING: {
        SAVE: async (data) => {
            try {
                const response = await SERVER.post("/setting", data);
                return response;
            } catch (e) {
                throw e;
            }
        },
        SHOW: async (key) => {
            try {
                const response = await SERVER.get("/setting", {
                    params: {
                        key,
                    },
                });
                return response;
            } catch (e) {
                throw e;
            }
        },
    },
    BLOG:{
        CREATE: async (blog) => {
            try {
                const response = await SERVER.post('/blog', blog).catch((error) => {
                    throw error;
                })
                return response;
            }catch (error){
                throw error;
            }
        },
        INDEX: async (start = 0, length = 10) => {
            try {
                const response = await SERVER.get(`/blog?start=${start}&length=${length}`).catch((error) => {
                   throw error;
                });
                return response;
            }catch (error){
                throw error;
            }
        },
        SHOW: async (id) => {
            try {
                const response = await SERVER.get('/blog/' + id).catch((error) => {
                    throw error;
                });
                return response;
            }catch (error){
                throw error;
            }
        },
        UPDATE: async (id, data) => {
            try {
                const response = await SERVER.put('/blog/' + id, data).catch((error) => {
                   throw error;
                });
                return response;
            }catch (error){
                throw error;
            }
        },
        DELETE: async (id) => {
            try {
                const response = await SERVER.delete('/blog/' + id).catch((error) => {
                   throw error;
                });
                return response;
            }catch (error){
                throw response;
            }
        },
        SEARCH: async (search, start = 0, length = 10) =>{
            try {
                const response = await SERVER.post('/blog/search/',{search, start, length}).catch((error) => {
                    throw error;
                })
                return response;
            }catch (error){
                throw error;
            }
        },
    },
    AUTH: {
        // CHECK_EMAIL: async () => {
        //
        // },
        LOGIN: async (user) => {
            try {
                const response = await GUEST.post('/login', user).catch(axiosCatch);
                const token = response.data.access_token;
                const userData = response.data.user;
                localStorage.setItem('token', token);
                localStorage.setItem('user', JSON.stringify(userData));
                window.location.replace('/admin');
            } catch (e) {
                throw e
            }
        }
    },

    SETTING: {
        GET: async (params = {lang: 'vi'}) => {
            try {
                return await SERVER.get('/setting', {params}).catch(axiosCatch);
            } catch (e) {
                console.log("E", e)
                MESSAGE.ERROR(e.message)
            }
        },
        SAVE: async (data) => {
            try {
                await SERVER.post('/setting/save', data).catch(axiosCatch);
                MESSAGE.SUCCESS('Save setting success!');
            } catch (e) {
                console.log("E", e)
                MESSAGE.ERROR(e.message)
            }
        }
    }
}
