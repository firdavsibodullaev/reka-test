function getHtml(data) {
    return `<div class="card">
                <div class="card-body">
                    <h4><strong>${data.name}</strong></h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>${data.body}</p>
                        <div>
                            <a href="${data.image}" target="_blank">
                                <img src="${data.image}"
                                     loading="lazy"
                                     style="width: 150px; aspect-ratio: 1; object-fit: cover"
                                     alt="preview">
                            </a>
                        </div>
                    </div>
                    <div>
                    ${getTags(data.tags)}
                    </div>
                </div>
            </div>`;
}

function getTags(tags) {
    return "";
}


export default getHtml
