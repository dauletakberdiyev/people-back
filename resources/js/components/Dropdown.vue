<template>
    <div
        class="position-relative"
        tabindex="1"
        @focusout="shown=false"
    >
        <div
            class="link d-flex align-items-center py-2 px-0 transition dropdown-toggle"
            :class="titleClasses"
            :style="titleStyles"
            @click="showDropdown()"
        >
            {{ $t(title) }}&nbsp;
        </div>
        <div
            class="dropdown dropdown-right transition rounded-lg bg-white text-lightblack shadow-sm pl-3"
            :class="[dropdownClasses,{dropup:dropup}]"
            :style="(shown ? dropdownShownStyles : '') + dropdownStyles"
        >
            <div
                v-for="(item,index) in items"
                :key="index"
                class="link border-bottom py-2 px-0"
                :class="itemClasses"
                :style="itemStyles"
                @click="itemOnClick(item);shown=false;"
            >
                {{ $t(item.name !=undefined ? item.name : item) }}
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        title: {
            type: [String, Number],
            default () {
                return "choose";
            }
        },
        itemOnClick: Function,
        items: Array,
        titleClasses: [Array, String],
        titleStyles: {
            type: String,
            default () {
                return "";
            }
        },
        dropdownClasses: [Array, String],
        dropdownShownStyles: {
            type: String,
            default () {
                return "max-height: 11.25em;";
            }
        },
        dropdownStyles: String,
        dropup: { type: Boolean, default () { return false; } },
        itemClasses: [Array, String],
        itemStyles: {
            type: String,
            default () {
                return "";
            }
        },
        onCreated: {
            type: Function,
            default () {
                return () => {};
            }
        }
    },
    data () {
        return {
            shown: false
        };
    },
    created () {
        this.onCreated();
    },
    methods: {
        showDropdown () {
            this.shown = !this.shown;
        }
    }
});
</script>
<style scoped>
/*firefox only*/
div * {
    scrollbar-color: #c5c5c5 #f4f4f4;
}

/*crossbd-flexser*/
::-webkit-scrollbar {
    width: 0.5em;
    height: 0.5em;
}

::-webkit-scrollbar-thumb {
    background: #c5c5c5;
}

::-webkit-scrollbar-track {
    background: #f4f4f4;
}
.dropup{
    top:unset;
    bottom:100%;
}
</style>
