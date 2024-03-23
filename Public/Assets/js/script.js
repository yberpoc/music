document.addEventListener('DOMContentLoaded', () => {

    const wrapper = document.querySelector('.wrapper')
    const records = document.querySelectorAll('.records__item')
    const popupRecord = document.querySelector('.record-popup')
    const closeBtn = document.querySelector('.record-popup--close')

    records.forEach(record => {
        record.addEventListener('click', () => {

            const dataParameter = record.dataset.parameters
            const dataValue = record.dataset.attribute
            const recordTitle = record.querySelector('.records__item--name b').textContent;

            let songItems = ''


            setLoader()

            fetch(`/api/records/?parameters=${dataParameter}&value=${dataValue}`)
                .then(response => response.json())
                .then(result => {

                    const recordTitleBlock = document.querySelector('.record-popup__block-info h2')
                    const recordTrackListBlock = document.querySelector('.record-popup__track-list')

                    result.forEach((song, index) => {
                        songItems += '<div class="record-popup__track">\n' +
                            `                <div class="record-popup__track--num">${index + 1}</div>\n` +
                            `                <div class="record-popup__track--title">${song.title}</div>\n` +
                            '                -\n' +
                            `                <div class="record-popup__track--author">${song.artist}</div>\n` +
                            '            </div>'
                    })

                    recordTitleBlock.innerHTML = recordTitle
                    recordTrackListBlock.innerHTML = songItems

                    removeLoader()

                    document.querySelector('body').style.overflow = 'hidden'

                    popupRecord.classList.add('record-popup--active')
                    wrapper.classList.add('wrapper--open-popup')
                });

        })
    })

    if (closeBtn)
    {
        closeBtn.addEventListener('click', () => {
            if (popupRecord.classList.contains('record-popup--active'))
            {
                popupRecord.classList.add('record-popup--hide')
                popupRecord.classList.remove('record-popup--active')

                wrapper.classList.add('wrapper--close-popup')
                wrapper.classList.remove('wrapper--open-popup')

                let hideClass = document.querySelector('.record-popup--hide')

                hideClass.addEventListener('animationend', () => {
                    popupRecord.classList.remove('record-popup--hide');
                    wrapper.classList.remove('wrapper--close-popup')
                });
            }
            document.querySelector('body').style.overflow = 'unset'
        })
    }


    function setLoader() {
        const wrapperBody = document.querySelector('.wrapper')

        document.querySelector('body').style.overflow = 'hidden'

        let overlay = document.createElement('div');
        let spinner = document.createElement('div');
        overlay.className = 'overlay';
        spinner.className = 'spinner center';

        overlay.appendChild(spinner)

        for (let i = 0; i < 12; i++)
        {
            let blade = document.createElement('div');
            blade.className = 'spinner-blade';
            spinner.appendChild(blade);
        }

        wrapperBody.insertBefore(overlay, wrapperBody.firstChild)
    }

    function removeLoader() {
        const wrapperBody = document.querySelector('.wrapper')

        document.querySelector('body').style.overflow = 'unset'

        wrapperBody.querySelector('.overlay').remove()
    }
})