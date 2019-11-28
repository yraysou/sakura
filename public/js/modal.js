    const adducePopupOpen = (ev) => {
        $('.delete, #adducePopupBg').show()
        const getId = ev.target.nextElementSibling.value

        const deleteModal = '{{/manager'+'/delete'+ getId +'}}';

        // $("div.popUp-wrapper").each(functiuon(){

        // });
    }    
const adducePopupClose = () => $('.delete, #adducePopupBg').hide();

const popupOpen = () => $('.update, #popupBg').show();
const popupClose = () => $('.update, #popupBg').hide();

