import axios from 'axios'

const actions = {
	mutedLoad (context, payload) {
		context.commit('mutedLoad', payload)
	},
	dropdownLoad (context, payload) {
		context.commit('dropdownLoad', payload)
	},
	setList (context, payload) {
		context.commit('setList', payload)
	},
	"SOCKET_oops" (state, server) {
		console.log(server)
	},
	setLangAction (context, payload) {
	  context.commit('setLangCommit', payload)
	},
	logout({commit}){
	  return new Promise((resolve, reject) => {
		commit('logout')
		localStorage.removeItem('access_token')
		delete axios.defaults.headers.common['Authorization']
		resolve()
	  })
	}
}
export default actions