import axios from 'axios';

export default function(baseUri = '') {
  const apiBaseUri = baseUri;

  return {
    post(uri, data, axiosConfig = {}) {
      return new Promise((resolve, reject) => {
        axios
          .post(`${apiBaseUri}${uri}`, data, axiosConfig)
          .then((res) => {
            resolve(res);
          })
          .catch((error) => {
            reject(error.response);
            console.error('[ERROR]', error);
          });
      });
    },
    put(uri, data) {
      return new Promise((resolve, reject) => {
        axios
          .put(`${apiBaseUri}${uri}`, data)
          .then((res) => {
            resolve(res);
          })
          .catch((error) => {
            reject(error.response);
          });
      });
    },
    patch(uri, data) {
      return new Promise((resolve, reject) => {
        axios
          .patch(`${apiBaseUri}${uri}`, data)
          .then((res) => {
            resolve(res);
          })
          .catch((error) => {
            reject(error.response);
          });
      });
    },
    delete(uri) {
      return new Promise((resolve, reject) => {
        axios
          .delete(`${apiBaseUri}${uri}`)
          .then((res) => {
            resolve(res);
          })
          .catch((error) => {
            reject(error.response);
          });
      });
    },
    get(uri, queryParams) {
      let params = {};
      if (queryParams) {
        params = { params: queryParams };
      }
      let base = '';
      if (uri.indexOf('http') !== 0) {
        base = apiBaseUri;
      }
      return new Promise((resolve, reject) => {
        axios
          .get(`${base}${uri}`, params)
          .then((res) => {
            resolve(res);
          })
          .catch((error) => {
            reject(error.response);
          });
      });
    },
//     upload(uri, data, axiosConfig = {}) {
//       const formData = new FormData();

//       forEach(data, (value, key) => {
//         formData.append(key, value);
//       });

//       return new Promise((resolve, reject) => {
//         axios
//           .post(`${apiBaseUri}${uri}`, formData, {
//             headers: {
//               'Content-Type': 'multipart/form-data',
//             },
//             ...axiosConfig,
//           })
//           .then((res) => {
//             resolve(res);
//           })
//           .catch((error) => {
//             reject(error.response);
//           });
//       });
//     },
   };
}