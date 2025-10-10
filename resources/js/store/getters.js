const getters = {
	isLoggedIn: state => !!state.token,
    static: state => state.static
}
export default getters