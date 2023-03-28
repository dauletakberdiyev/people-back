<template>
    <div class="text-start">
        <div class="py-5 bg-grey-light padding text-darkgrey">
            <h1>
                {{ $t('employer.title') }}
            </h1>
        </div>
        <div class="padding mt-5 d-flex flex-column">
            <form @submit.prevent="storeEmployer">
                <div class="pt-5 w-600 fw-bold ls-0 font-size-14 lh-normal">
                    {{ $t('employer.desc') }}
                </div>
                <div class="d-flex flex-column mt-3">
                    <div class="text-start font-size-14 fw-bold">
                        {{ $t('employer.company') }}
                    </div>
                    <div class="d-flex mt-3">
                        <div class="d-flex flex-column me-4">
                            <div class="flex-start font-size-12">{{ $t('employer.company_name') }}</div>
                            <input type="text" class="in-text w-240 p-2 font-size-14" v-model="request.name" required>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="flex-start font-size-12">{{ $t('employer.company_site') }}</div>
                            <input type="text" class="in-text w-240 p-2 font-size-14" v-model="request.web_site" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column mt-3">
                    <div class="text-start font-size-14 fw-bold">
                        {{ $t('employer.company_info') }}
                    </div>
                    <div class="d-flex mt-3">
                        <div class="d-flex flex-column me-4">
                            <div class="flex-start font-size-12">{{ $t('employer.position') }}</div>
                            <input type="text" class="in-text w-240 p-2 font-size-14" v-model="request.position" required>
                        </div>
                        <div class="d-flex flex-column me-4">
                            <div class="flex-start font-size-12">{{ $t('employer.employment') }}</div>
                            <select type="text" class="in-text w-240 p-2 font-size-14 bg-white" v-model="request.employment" required>
                                <option v-for="employment in values.employmentTitle" :value="employment.id">
                                    {{ employment.title }}
                                </option>
                            </select>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="flex-start font-size-12">{{ $t('employer.city') }}</div>
                            <select class="in-text w-240 p-2 font-size-14 bg-white" v-model="request.city" required>
                                <option v-for="city in values.cities" :value="city.id">
                                    {{ city.title }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="d-flex flex-column me-4">
                            <div class="flex-start font-size-12">{{ $t('employer.salary') }}</div>
                            <input type="text" class="in-text w-240 p-2 font-size-14" v-model="request.salary" required>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="flex-start font-size-12">{{ $t('employer.experience') }}</div>
                            <input type="number" class="in-text w-240 p-2 font-size-14" min="0" max="30" v-model="request.experience" required>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-3">
                        <div class="flex-start font-size-12">{{ $t('employer.position_desc') }}</div>
                        <textarea class="font-size-14 p-2 textarea" rows="4" v-model="request.position_desc" required></textarea>
                    </div>
                </div>
                <div class="d-flex flex-column mt-3">
                    <div class="text-start font-size-14 fw-bold">
                        {{ $t('employer.contacts') }}
                    </div>
                    <div class="d-flex mt-3">
                        <div class="d-flex flex-column me-4">
                            <div class="flex-start font-size-12">{{ $t('employer.name') }}</div>
                            <input type="text" class="in-text w-240 p-2 font-size-14" v-model="request.first_last_name" required>
                        </div>
                        <div class="d-flex flex-column me-4">
                            <div class="flex-start font-size-12">{{ $t('employer.phone') }}</div>
                            <input type="text" class="in-text w-240 p-2 font-size-14" v-model="request.phone" required>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="flex-start font-size-12">{{ $t('employer.email') }}</div>
                            <input type="text" class="in-text w-240 p-2 font-size-14" v-model="request.email" required>
                        </div>
                    </div>
                    <div class="mt-5 mb-5 d-flex">
                        <div class="d-flex me-5">
                            <label
                                class="d-flex align-items-center text-blue"
                                for="upload"
                            >
                                <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="attach_file_24px">
                                        <path
                                            id="icon/editor/attach_file_24px"
                                            d="M16 6V17.5C16 19.71 14.21 21.5 12 21.5C9.79 21.5 8 19.71 8 17.5V5C8 3.62 9.12 2.5 10.5 2.5C11.88 2.5 13 3.62 13 5V15.5C13 16.05 12.55 16.5 12 16.5C11.45 16.5 11 16.05 11 15.5V6H9.5V15.5C9.5 16.88 10.62 18 12 18C13.38 18 14.5 16.88 14.5 15.5V5C14.5 2.79 12.71 1 10.5 1C8.29 1 6.5 2.79 6.5 5V17.5C6.5 20.54 8.96 23 12 23C15.04 23 17.5 20.54 17.5 17.5V6H16Z"
                                            fill="currentColor"
                                            fill-opacity="0.54"
                                        />
                                    </g>
                                </svg>
                                {{ $t('cv.attach_logo') }}
                                <input
                                    id="upload"
                                    type="file"
                                    style="display:none"
                                    accept=".png,.jpeg,.jpg"
                                    @change="onLogoChange"
                                    required
                                >
                            </label>
                        </div>
                        <button class="btn btn-primary  rounded-extra px-5 py-2 font-size-13">{{ $t('cv.send') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "indexEmployer",
    data(){
        return {
            request:{
                name:'',
                web_site:'',
                position:'',
                employment:'',
                city:'',
                salary:'',
                experience:'',
                position_desc:'',
                first_last_name:'',
                phone:'',
                email:'',
                logo:null
            },
            values:{
                employmentTitle:[],
                cities: []
            }
        }
    },
    mounted() {
        this.getEmploymentTitle();
        this.getCities()
    },
    methods:{
        onLogoChange(e){
            this.request.logo = e.target.files[0];
        },
        storeEmployer(){
            const formData = new FormData();
            for(const key in this.request){
                formData.append(key, this.request[key])
            }
            this.$http.post('api/employer', formData)
                .then(response => {
                    this.$router.push({name:'success'})
                    this.$emit.close;
                })
                .catch(err => {
                    alert(err.response.data.message);
                })
        },
        getEmploymentTitle(){
            this.$http.get('api/employment/' + this.$i18n.locale)
                .then(response => {
                    this.values.employmentTitle = response.data;
                })
        },
        getCities(){
            this.$http.get('api/city/' + this.$i18n.locale)
                .then(response => {
                    this.values.cities = response.data;
                })
        }
    }
}
</script>

<style scoped>
.w-600{
    width:40.25em;
}
.ls-0{
    letter-spacing: 0;
}
.lh-normal{
    line-height: normal;
}
.in-text, .textarea{
    border: 1px solid gray;
    border-radius: 5px;
}
.w-240{
    width: 18.25em;
}
</style>
