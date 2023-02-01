const axiosCatch = (error) => {
    // const data = error.response.data;
    // console.log("Error", error)
    // console.log(error.response.statusText)
    // if (error.response.status === 422) {
    //     const valid = Object.entries(data);
    //     throw valid.shift().toString();
    // }
    // if ([404, 500, 401].includes(error.response.status)) {
    //     throw error.response.statusText;
    // }
    // throw error.message;

    if (error.response) {
        throw error.request.statusText;
    } else if (error.request) {
        throw error.message;
    } else {
        throw "opps! something went wrong while setting up request";
    }
    throw error.message;

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
        toastr.success(content , title);
    },
    INFO: (content = '', title = '') => {
        toastr.info(content , title);
    },
    WARN: (content = '', title = '') => {
        toastr.warning(content , title);
    },
    ERROR: (content = '', title = '') => {
        toastr.error(content , title);
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
        CREATE: async () => {
        },
        DELETE: async (productId) => {
        }
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
    }
}
