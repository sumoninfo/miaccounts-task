const filters = {
    numberFormat(number) {
        return parseFloat(number).toFixed(0).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
}
export default filters;
