<template>
    <WebViewer :initialDoc="this.docPath"></WebViewer>
</template>

<script>
import WebViewer from "@/components/WebViewer.vue";

export default {
    name: "PdfViewer",
    components: {
        WebViewer,
    },
    props:{
        docPath: {
            type: String
        }
    }
}
</script>