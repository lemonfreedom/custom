// 主题
const toggleThemeBtn = document.querySelector('button[data-bs-toggle="theme"]')
const useTheme = (theme) => {
    if (toggleThemeBtn)
        toggleThemeBtn.innerHTML = theme === 'dark' ?
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill" viewBox="0 0 16 16"><path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" /></svg> <span class="d-lg-none">切换亮色主题</span>' :
            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-fill" viewBox="0 0 16 16"><path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/></svg> <span class="d-lg-none">切换黑暗主题</span>'
    localStorage.setItem('theme', theme)
    document.body.setAttribute('data-bs-theme', theme)
}
useTheme(localStorage.getItem('theme'))
if (toggleThemeBtn)
    toggleThemeBtn.addEventListener('click', function () {
        useTheme(localStorage.getItem('theme') === 'dark' ? 'light' : 'dark')
    })

// 通知信息
var globalNotice = Cookies.get('custom_notice')
if (globalNotice) {
    const {
        content,
        type
    } = JSON.parse(globalNotice)
    const alertEl = document.createElement('div');
    alertEl.classList.add('alert');
    alertEl.classList.add(`alert-${type}`)
    alertEl.classList.add(`mt-3`)
    content.forEach((msg, i) => {
        const itemEl = document.createElement('p');
        if (content.length === i + 1) {
            itemEl.classList.add('mb-0')
        } else {
            itemEl.classList.add('mb-1')
        }
        itemEl.innerText = msg;
        alertEl.appendChild(itemEl)
    });
    document.querySelector('.main').insertAdjacentElement('afterBegin', alertEl)
    Cookies.remove('custom_notice')
};

// 文章文件上传
// let postUpload = document.querySelector('#postUpload');
// if (postUpload) {
//     postUpload.querySelector('#uploadButton').addEventListener('click', function (e) {
//         let input = document.createElement('input');
//         input.setAttribute('type', 'file');
//         input.setAttribute('multiple', 'multiple');
//         input.click();
//         input.addEventListener('change', function (e) {
//             [...this.files].forEach(file => {
//                 let formData = new FormData();
//                 formData.append('file', file);
//                 fetch('/file/upload', {
//                     method: 'post',
//                     body: formData
//                 }).then(res => res.json()).then(res => {
//                     if (res.code === 0) {
//                         postUpload.appendChild
//                         postUpload.insertAdjacentHTML('beforeend', `<div class="panel-block is-flex-direction-column is-align-items-flex-start" data-type="fileItem" data-cid="${res.data.cid}">
//                             <div class="mb-2">
//                                 <strong class="is-text-wrap">${res.data.name}</strong>
//                             </div>
//                             <div class="is-flex is-align-items-center">
//                                 <strong class="has-text-grey-light">${res.data.size}</strong>
//                                 <a class="button is-info ml-2" href="">
//                                     <span class="icon is-small">
//                                         <svg width="1rem" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
//                                             <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
//                                         </svg>
//                                     </span>
//                                 </a>
//                                 <a class="button is-danger ml-2" href="">
//                                     <span class="icon is-small">
//                                         <svg width="1rem" height="1rem" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
//                                             <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
//                                         </svg>
//                                     </span>
//                                 </a>
//                             </div>
//                         </div>`);
//                     }
//                 });
//             });
//         });
//     });
// }

// postUpload.addEventListener('click', function (e) {
//     if (e.target.dataset.type === 'delete') {
//         if (confirm('删除后无法恢复，是否确认删除？')) {
//             let formData = new FormData();
//             formData.append('cid', e.target.dataset.cid);
//             fetch('/file/delete', {
//                 method: 'post',
//                 body: formData
//             }).then(res => res.json()).then(res => {
//                 if (res.code === 0) {
//                     document.querySelectorAll('[data-type="fileItem"]').forEach(el => {
//                         if (el.dataset.cid === e.target.dataset.cid) {
//                             el.remove();
//                         }
//                     });
//                 }
//             });
//         }
//     }
// });
