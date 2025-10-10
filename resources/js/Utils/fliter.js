import Vue from 'vue'
import moment from 'moment'
import i18n from '../i18n'
import Store from '../store/index'

function formatNumber (value) {
  return Number(value).toLocaleString()
}
const formatForDate = 'DD/MM/YYYY'

function dateFormat (value, format = formatForDate) {
    return moment(value).format(format)
}
function formatLabel(str) {
  str = str.replace(/_/g, ' ');
  str = str.replace(/([a-z])([A-Z])/g, '$1 $2');
  return str.replace(/\b\w/g, char => char.toUpperCase());
}

Vue.filter('formatLabel', function (value) {
  return formatLabel(value)
})

Vue.filter('dateFormat', function (value) {
  return dateFormat(value)
})


export { dateFormat, formatLabel }
