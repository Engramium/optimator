import { reactive } from "vue";
import fn from "./functions";
import icons from "./icons";

const data = reactive({
    quickToggles: null,
});

export { data, fn, icons };