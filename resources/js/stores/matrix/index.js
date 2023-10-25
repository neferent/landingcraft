import { defineStore } from 'pinia';
import actions from './actions'

export const useMatrixStore = defineStore('matrix', {
  state: () => ({
    matrices: {},
    matrix: {},
    currentMatrix: '',
  }),
  actions,

})