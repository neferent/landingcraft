import API from '@api/api.base';

const matrixAPI = {
    fetchMatrices: () => API.get('/matrix/all'),
    fetchMatrix: (key) => API.get(`/matrix/fetch/${key}`),
    makeEmptySection: (data) => API.post('/section/create', data),
    fetchSection: (key) => API.get(`/section/fetch/${key}`),
    registerSection: (data) => API.post('/section/register', data),
}

export default matrixAPI;