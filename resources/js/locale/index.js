import { createI18n } from "vue-i18n";

import en from "./en";
import ru from "./ru";
import kz from "./kz";

const messages = {
  ru,
  en,
  kz
};

export default createI18n({
  fallbackLocale: "ru",
  messages,
  silentTranslationWarn: true,
  silentFallbackWarn: true
});
