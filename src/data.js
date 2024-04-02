import { reactive } from "vue";
import fn from "./functions";
import icons from "./icons";

const data = reactive({
    quickToggles: null,
    currentTab: fn.getCurrentTab(),
});

export { data, fn, icons };