<template>


    <Toast />
    <button :class="btnClass" type="button" @click=" Model8=true">
        {{ buttonLabel }}
    </button>

    <MediumModal :showModal="Model8" @close="close" @click.self="closeModel8()">


        <div class="bg-white rounded-md border-all border-8 w-full">
            <div class="py-4 px-5 lg:px-4 w-full text-center bg-all font-Tajawal">
                <h3 class="font-bold items-center space-x-2 text-white text-all">
                    إضافة دمفة إلكترونية
                </h3>
            </div>
            <div class="py-3 flex-grow w-full px-3 border-b-2">
                <div class="py-2 px-2 grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-4 lg:gap-5">
                    <div class="space-y-1">
                        <label class="label">رقم الملف</label>
                        <input class="input-box" type="number">
                    </div>

                    <div class="space-y-1">
                        <label class="label">المبلغ</label>
                        <input class="input-box" type="number">
                    </div>

                    <div class="space-y-1">
                        <label class="label">العملة</label>
                        <select class="input-box"></select>
                    </div>

                    <div class="space-y-1 col-span-3">
                        <label class="label">ملاحظات</label>
                        <input class="input-box" type="text">
                    </div>

                    <div class="space-y-1">
                        <label class="label">رقم الهوية</label>
                        <input class="input-box" type="number">
                    </div>

                    <div class="space-y-1 col-span-2">
                        <label class="label">الإسم</label>
                        <input class="input-box" type="text">
                    </div>
                </div>
            </div>

            <!-- start    modal fotter-->

            <div class="text-gray-900 text-center py-3 mt-2 w-full">
                <button type="button"
                    class="mt-2 mx-3 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-lg text-base font-medium font-Tajawal font-Tajawal text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    @click="addclass(specifcationSelected)">
                    إضافة

                    <svg class="hi-solid hi-plus inline-block w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1
        0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>

                <button type="submit"
                    class="mx-3 space-x-2 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-lg text-base font-medium font-Tajawal font-Tajawal text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400"
                    @click="closeclassessModel()">
                    إلغاء

                    <svg class="hi-solid hi-refresh inline-block w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1
          1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1
          1 0 01.61-1.276z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </MediumModal>
</template>

<script>
import MediumModal from "@/components/Modal/MediumModal.vue";
import Toast from "primevue/toast";
import {
    SearchIcon,
    SaveIcon,
    XIcon,
    TrashIcon,
    PencilIcon,
    PlusIcon,
} from "@heroicons/vue/solid";

export default {
    name: "ClassificationAdded",
    components: {
        // SelectDepartmet,
        MediumModal,
        Toast,
        SearchIcon,
        SaveIcon,
        XIcon,
        TrashIcon,
        PencilIcon,
        PlusIcon,
    },
    props: {

        btnClass: {
            type: Text,
            default: "btn-table-info",
        },
        TYPEFILE: {
            type: Text,
        },
        DEPT_TYPE: {
            type: Number,
        },
        COURT_TYPE: {
            type: Number,
        },
        addclassification: {
            type: Function,
        },
    },
    data() {
        return {
            buttonLabel: "اضافة دمفة الكترونية",
            P_USER_INFO: "",
            Model8: false,
            search: "",
            searchsubclass: "",
            getMainClassification: [],
            specifcationSelected: "",
            getSubClassifications: [],
        };
    },

    created() {
        this.P_USER_INFO = localStorage.getItem("LOGIN_DATA");
        this.getValueBycode();

    },

    methods: {


        getValueBycode() {

            var formData = new FormData();
            formData.append("P_CONFIG_CODE", 'WRITER_STAMP_VALUE');

            this.axios
                .post("UtilityController/GET_CONFIG_VALUE_BY_CODE", formData)
                .then((response) => {

                })

                .catch(function(error) {
                    console.log(error + "--**--");
                });
        },

        //جلب التصنيفات حسب رقم المحكمة والقسم
        getclassbycourt() {
            this.getMainClassification = [];
            this.getSubClassifications = [];
            this.specifcationSelected = "";
            var formData = new FormData();
            formData.append("P_DEPT_TYPE_NO", this.DEPT_TYPE);
            formData.append("P_COURT_TYPE", this.COURT_TYPE);
            formData.append("P_IS_REQ", this.TYPEFILE);
            formData.append("P_USER_INFO", this.P_USER_INFO);
            this.axios
                .post("UtilityController/GENERAL_CLAIMS_CLASS_GET", formData)
                .then((response) => {
                    if (response.data.P_RESULT_OUT.length == 0) {
                        this.getMainClassification = [];
                    } else {
                        this.getMainClassification = response.data.P_RESULT_OUT;
                        // if (this.specifcationSelected.lenght) {
                        //   this.getClassess();
                        // }
                    }
                })

                .catch(function(error) {
                    console.log(error + "--**--");
                });
        },

        closeclassessModel() {
            this.closeModel8();
            this.classificaltionAllText();
        },
        closeModel8() {
            this.Model8 = false;
        },
        //تصنيف فرعي
        subClassification(mainClass) {
            var formData = new FormData();
            formData.append("P_CLASS_NO", mainClass);
            formData.append("P_USER_INFO", this.P_USER_INFO);
            this.axios
                .post("UtilityController/GENERAL_CLAIMS_BY_CLASS_GET", formData)
                .then((response) => {
                    this.emptyResult = false;

                    if (response.data.P_RESULT_OUT.length == 0) {
                        this.getSubClassifications = [];
                    } else {
                        this.getSubClassifications = response.data.P_RESULT_OUT;
                        // this.getClassess();
                    }
                })

                .catch(function(error) {
                    console.log(error + "--**--");
                });
        },
        deletespecification(id) {
            this.specifcationSelected = "";
        },

        classificaltionAllText() {
            this.txt = "";
            for (var i = 0; i < this.specifcationSelected.length; i++) {
                this.txt += this.specifcationSelected[i].GENERAL_CLAIM_NAME + ".";
            }
        },
        close() {
            this.Model8 = false;
        },
        selectspecifcationSelected(value) {
            this.specifcationSelected = value;
            this.specifcationSelected.checked = true;
        },
    },

    computed: {

    },
};
</script>

<style lang="scss" scoped></style>
