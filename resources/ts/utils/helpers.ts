// Add body margin when in staging mode
const staging = document.querySelector<HTMLElement>('.ccm-production-mode-staging');
const stagingNotice = document.querySelector<HTMLElement>('.ccm-production-notice-staging');
if (staging && stagingNotice) {
    staging.style.marginBottom = `${stagingNotice.clientHeight}px`;
}

// wrap all bootstrap tables in table responsive
const tables = document.querySelectorAll('table.table');
[...tables].forEach((table: Element) => {
    const div = document.createElement('div');
    div.classList.add('table-responsive');
    div.appendChild(table);
    table.parentNode?.replaceChild(div, table);
});
