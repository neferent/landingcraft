import API from '@api/api.base';

const matrixAPI = {
    fetchMatrices: () => API.get('/matrix/all'),
    fetchMatrix: (key) => API.get(`/matrix/fetch/${key}`),
    updateMatrix: (data) => API.post('/matrix/update/', data),
    createMatrix: (data) => API.post(`/matrix/new/`, data),
    makeEmptySection: (data) => API.post('/section/create', data),
    fetchSection: (key) => API.get(`/section/fetch/${key}`),
    registerSection: (data) => API.post('/section/register', data),
    createModule: (data) => API.post('/module/create', data),
    fetchModule: (key) => API.get(`/module/fetch/${key}`),
}

export default matrixAPI;