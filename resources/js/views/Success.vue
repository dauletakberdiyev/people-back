<template>
    <div class="text-start">
        <div class="padding success">
            <div class="text-start font-size-42 mb-3">
                {{ $t('success.title') }}
            </div>
            <div class="text-start font-size-24 lh-normal" v-html="$t('success.desc')"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "success"
}
</script>

<style scoped>
.lh-normal{
    line-height: normal;
}
.success{
    margin-top: 8em;
    margin-bottom: 20em;
}
</style>
