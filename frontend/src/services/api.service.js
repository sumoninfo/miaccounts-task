import axios from 'axios';

const ApiService = {
    init() {
        axios.defaults.baseURL = import.meta.env.VITE_APP_API_URL + "/api/";
    },

    get(resource, params) {
        return axios.get(`${resource}`, params);
    },

    post(resource, params) {
        return axios.post(`${resource}`, params);
    },

    update(resource, params) {
        return axios.put(`${resource}`, params);
    },

    delete(resource, params) {
        return axios.delete(resource);
    },
};

export default ApiService;
