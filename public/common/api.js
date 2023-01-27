const axiosCatch = (error) => {
    const data = error.response.data;
    if (error.response.status === 422) {
        const valid = Object.entries(data);
        throw valid.shift().toString();
    }
    if ([404, 500, 401].includes(error.response.status)) {
        throw error.response.statusText;
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


const API = {
    AUTH: {
        LOGIN: async (user) => {
            try {
                const response = await GUEST.post('/login', user).catch(axiosCatch);
                const token = response.data.access_token;
                const userData = response.data.user;
                console.log("RES", response)
                localStorage.setItem('token', token);
                localStorage.setItem('user', JSON.stringify(userData));
                window.location.replace('/admin');
            } catch (e) {
                throw e.message;
            }
        }
    }
}
