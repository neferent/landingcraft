import apiBase from '@api/api.base'

export default {
  async fetchMatrices() {
    try {
      this.matrices = await apiBase.get('/matrix/all');
    } catch (error) {
      console.error('[ERROR]', error);
      return error;
    }
  },

  async fetchMatrix(key) {
    try {
      this.matrix = await apiBase.get(`/matrix/fetch/${key}`);
    } catch (error) {
      console.error('[ERROR]', error)
    }
  },
}
