import matrixAPI from '@api/matrix.api';

export default {
  async fetchMatrices() { 
    this.matrices = await matrixAPI.fetchMatrices(); 
  },
  async fetchMatrix(key) {
    this.matrix = await matrixAPI.fetchMatrix(key);
  },
  async updateMatrix(data) {
    await matrixAPI.updateMatrix(data)
  },
  async createMatrix(data) {
    await matrixAPI.createMatrix(data);
  },
  async destroyMatrix(key) {
    await matrixAPI.destroyMatrix(key);
  },
  clearMatrix() {
    this.matrix = {};
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
  },
  async fetchModule(key) {
    const module = matrixAPI.fetchModule(key);
    return module;
  },
  async createModule(data) {
    await matrixAPI.createModule(data);
  },
};

