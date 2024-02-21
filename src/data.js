import { reactive } from "vue";
import fn from "./functions";
import icons from "./icons";

const data = reactive({
    quickToggles: {
        generals: [
            {
                key: 'disable-emojis',
                value: false,
            },
            {
                key: 'disable-dashicons',
                value: false,
            },
            {
                key: 'disable-embeds',
                value: false,
            },
            {
                key: 'disable-xml-rpc',
                value: false,
            },
            {
                key: 'remove-jquery-migrate',
                value: false,
            },
            {
                key: 'hide-wp-version',
                value: false,
            },
            {
                key: 'disable-comments',
                value: false,
            },
            {
                key: 'disable-rest-api',
                value: false,
            },
        ],
        medias: [
            {
                key: 'disable-thumbnail',
                value: false,
            },
            {
                key: 'disable-medium',
                value: false,
            },
            {
                key: 'disable-large',
                value: false,
            },
        ],
    },
    currentTab: fn.getCurrentTab(),
});

export { data, fn, icons };