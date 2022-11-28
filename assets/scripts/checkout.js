const totalprice = document.getElementById('totalprice')
let price_inputs = document.getElementsByClassName('price-input')
let price_outputs = document.getElementsByClassName('price-output')
let unit_price = Array(price_inputs.length)
for (let i=0;i<price_inputs.length;i++){
    unit_price[i] = parseInt(price_outputs[i].innerHTML.replace(/BDT /, ''))
}

function refresh_price() {
    let total_price_int = 0
    for (let i=0;i<price_inputs.length;i++){
        let quantity = parseInt(price_inputs[i].value)
        price_outputs[i].innerHTML = 'BDT '+(quantity*unit_price[i]).toString()
        total_price_int += quantity*unit_price[i]
    }
    totalprice.innerHTML = 'Total: '+total_price_int.toString()+' BDT'
}