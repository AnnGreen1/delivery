<template>

    <div class="root">
        <!--标签栏对应的内容区域-->
        <router-view>
               
        </router-view>
        <!--标签栏区域-->
    <tab-bar v-show="Visual"></tab-bar>
    </div>
</template>

<script>
import TabBar from '../components/TabBar.vue'
export default {
    data(){
        return {
            Visual:true,
        }
    },
    components:{
        "tab-bar":TabBar,
    },
  
    mounted() {
        if(this.$route.name=='mine/newaddress' || this.$route.name=="mine/password" || this.$route.name=="mine/address" || this.$route.name=="mine/icon" || this.$route.name=="mine/payword" || this.$route.name=="mine/balance")
        {
            this.Visual = false;
        }
    },
    created() {
        if(this.$route.name=='mine/newaddress' || this.$route.name=="mine/password" || this.$route.name=="mine/address" || this.$route.name=="mine/icon" || this.$route.name=="mine/payword" || this.$route.name=="mine/balance")
        {
            this.Visual = false;
        }
    },
    updated() {
        if(this.$route.name=='mine/newaddress' || this.$route.name=='Meal'||this.$route.name=="mine/password" || this.$route.name=="mine/address" || this.$route.name=="mine/icon" || this.$route.name=="mine/payword" || this.$route.name=="mine/balance")
        {
            this.Visual = false;
        }
    },
}
</script>

<style lang="scss" scoped>
tab-bar{
    z-index: 2;
}
</style>