const fn = {
    fetchAdminAjax: async function (api_url, method, params = {}) {
        let requestUrl = api_url;

        const request = {
            method: method.toUpperCase(),
        };

        if (method.toUpperCase() == "POST" || method.toUpperCase() == "PUT") {
            const formData = new FormData();
            this.convertObjectToFormData(formData, params);
            request.body = formData;
        } else if (method.toUpperCase() == "GET") {
            if (params.hasOwnProperty('action')) {
                requestUrl += `?action=${params.action}`;
            }
            Object.keys(params).forEach(key => {
                if (key != 'action' && typeof params[key] != 'object') {
                    requestUrl += `&${key}=$${params[key]}`;
                }
            });
        }

        const res = await fetch(requestUrl, request);

        const response = await res.json();
        return response;
    },
    convertObjectToFormData: function (formData, data, parentKey) {
        if (
            data &&
            typeof data === "object" &&
            !(data instanceof Date) &&
            !(data instanceof File)
        ) {
            Object.keys(data).forEach((key) => {
                this.convertObjectToFormData(
                    formData,
                    data[key],
                    parentKey ? `${parentKey}[${key}]` : key
                );
            });
        } else {
            const value = data == null ? "" : data;
            formData.append(parentKey, value);
        }
    },
    setCurrentTab: function (data) {
        this.setLocalStorage('optimator-current-tab', data);
    },
    getCurrentTab: function () {
        const tab = this.getLocalStorage('optimator-current-tab');
        return (tab === null) ? 'welcome' : tab;
    },
    setLocalStorage: function (key, data) {
        localStorage.setItem(key, data);
    },
    getLocalStorage: function (key) {
        return localStorage.getItem(key);
    },
};

export default fn;