const mutations = {
	mutedLoad (state, data) {
		state.static = data
	},
	dropdownLoad (state, payload) {
		state.commonObj = Object.assign({}, state.commonObj, payload)
	},
	setList (state, data) {
		state.list = data
	},
	toggleSidebarDesktop (state) {
	  const sidebarOpened = [true, 'responsive'].includes(state.sidebarShow)
	  state.sidebarShow = sidebarOpened ? false : 'responsive'
	},
	toggleSidebarMobile (state) {
	  const sidebarClosed = [false, 'responsive'].includes(state.sidebarShow)
	  state.sidebarShow = sidebarClosed ? true : 'responsive'
	},
	set (state, [variable, value]) {
	  state[variable] = value
	},
	setLangCommit (state, data) {
	  state.lang = data
	},
	auth_success (state, token, user) {
	  state.token = token,
	  state.user = user
	},
	logout(state){
	  state.token = '',
	  state.user = ''
	},
	mutateDropdown (state, payload) {
		state.commonObj = Object.assign({}, state.commonObj, payload)
	}
  }
export default mutations