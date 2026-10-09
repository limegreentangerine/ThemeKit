export const breakpoints = {
    xs: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-xs').replace('px', '').trim(),
    sm: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-sm').replace('px', '').trim(),
    md: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-md').replace('px', '').trim(),
    lg: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-lg').replace('px', '').trim(),
    xl: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-xl').replace('px', '').trim(),
    xxl: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-xxl').replace('px', '').trim(),
    xxxl: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-xxxl').replace('px', '').trim(),
    hd: getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-hd').replace('px', '').trim(),
    '4k': getComputedStyle(document.documentElement).getPropertyValue('--bs-breakpoint-4k').replace('px', '').trim()
};

export default breakpoints;
