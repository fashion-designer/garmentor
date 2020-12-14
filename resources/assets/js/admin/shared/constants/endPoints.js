const BASE_ENDPOINT = `http://${window.location.hostname}`;

const ADMIN = `${BASE_ENDPOINT}/admin`;

const GET_SELECTED_ADMIN_PROFILE = `${ADMIN}/admins-list/edit`;

const GET_SELECTED_DESIGNER_PROFILE = `${ADMIN}/designers-list/edit`;

const GET_SELECTED_USER_PROFILE = `${ADMIN}/users-list/edit`;

export {
    BASE_ENDPOINT,
    ADMIN,
    GET_SELECTED_ADMIN_PROFILE,
    GET_SELECTED_DESIGNER_PROFILE,
    GET_SELECTED_USER_PROFILE
}
