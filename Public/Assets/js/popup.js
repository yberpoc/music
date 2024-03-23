/* document.addEventListener('DOMContentLoaded', () => {

    const records = document.querySelectorAll('.records__item')

    records.forEach(record => {
        record.addEventListener('click', () => {

            const dataParameter = record.dataset.parameters
            const dataValue = record.dataset.attribute
            const recordTitle = record.querySelector('.records__item--name b').textContent;

            let songItems = ''


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
                });

        })
    })

}) */