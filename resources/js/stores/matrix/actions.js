import matrixAPI from '@api/matrix.api';

export default {
  async fetchMatrices() { 
    this.matrices = await matrixAPI.fetchMatrices(); 
  },
  async fetchMatrix(key) {
    this.matrix = await matrixAPI.fetchMatrix(key);
  },
  async makeEmptySection(data) {
    await matrixAPI.makeEmptySection(data);
    this.fetchMatrix(data.key);
  },
  async fetchSection(key) {
    const section = matrixAPI.fetchSection(key);
    return section;    
  },
  async registerSection(data) {
    await matrixAPI.registerSection(data);
  }
};

