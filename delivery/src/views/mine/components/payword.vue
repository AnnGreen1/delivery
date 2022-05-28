<template>
  <div class="container">
    <van-nav-bar
      class="nav-bar"
      title="支付密码"
      left-arrow
      @click-left="$router.push('/mine')"
    ></van-nav-bar>
    <div class="tips">{{ tips }}</div>
    <!-- 密码输入框 -->
    <van-password-input
      info="请输入支付密码"
      :value="value"
      :focused="showKeyboard"
      @focus="showKeyboard = true"
    />
    <!-- 数字键盘 -->
    <van-number-keyboard
      v-model="value"
      :show="showKeyboard"
      @blur="showKeyboard = false"
    />
  </div>
</template>

<script>
import globalConfig from '../../../globalConfig.vue';
import { ref } from 'vue';
import { Toast } from 'vant';
export default {
  setup() {
    const value = ref('');
    const showKeyboard = ref(true);
    return {
      value,
      showKeyboard,
    };
  },
  data() {
    return {
      time: 0,
      code: 0,
      tips: '请先输入原支付密码',
    }
  },
  created() {
    console.log(this.value);
  },
  watch: {
    value() {
      this.time++;
      if (this.time == 6) {
        this.$axios({
          methods: 'post',
          url: globalConfig.base_url+`/deliveryServer/updatepayword.php?username=${sessionStorage.getItem('username')}&payword=${this.value}&type=1`,
        }).then((res) => {
          if (res.code == 1001) {
            this.code = res.code;
          }
          Toast.fail(res.msg);
        }).catch((error) => {
        })
        this.value = '';
        this.tips = '请输入新支付密码';
      }
      if (this.time == 13) {
        this.$axios({
          methods: 'post',
          url: globalConfig.base_url+`/deliveryServer/updatepayword.php?username=${sessionStorage.getItem('username')}&payword=${this.value}&type=2`,
        }).then((res) => {
          // this.code = res.code;
          // Toast.fail(res.msg);
          // this.$router.push("mine");
          if(res.code == 1001)
          {
            Toast.success(res.msg);
            this.$router.push("/mine");
          }
        }).catch((error) => {
          // Toast.success(res.msg);
          this.$router.push("/mine");
        })
      }

    }
  },
};
</script>

<style lang="scss" scoped>
.container {
  .tips {
    font-size: 20px;
    margin: 30px;
  }
}
</style>