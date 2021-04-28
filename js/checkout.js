const formCheckout = document.querySelector('.form-checkout');


formCheckout.addEventListener('submit', (e) => {

    e.preventDefault();

});

document.addEventListener('DOMContentLoaded', () => {

    const cardNumberHelpBlock = document.querySelector('#cardNumberHelpBlock');
    /*
        Amex : 34...
        Visa : 4...
        Diners : 300...
        Mastercard : 51....
        JCB : 35...
        Discover : 6011
    */

    let cleave = new Cleave('#card_number', {
        creditCard: true,
        delimiter: '-',
        onCreditCardTypeChanged: function(type){

            if (type == 'unknown') {
                cardNumberHelpBlock.textContent = 'Invalid card number';

                const cardBranches = document.querySelector('.card-branches');

                cardBranches.querySelectorAll('.fab').forEach(item => {
                    item.classList.add('fa-disabled');
                });
            } else {

                const cardBranches = document.querySelector('.card-branches');
                cardBranches.querySelectorAll('.fab').forEach(item => {

                    if (item.classList.toString().includes(type)) {
                        item.classList.remove('fa-disabled');

                    } else {
                        item.classList.add('fa-disabled');
                    }
                });                

                cardNumberHelpBlock.textContent = "";
            }            
        }
    })

});



