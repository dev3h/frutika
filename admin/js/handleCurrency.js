function handleCurrency(price) { 
    return new Intl.NumberFormat('VN', {  currency: 'VND' }).format(price)
 }