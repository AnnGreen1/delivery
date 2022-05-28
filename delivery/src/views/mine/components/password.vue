<template>
  <div class="container">
    <van-nav-bar
      class="nav-bar"
      title="登录密码"
      left-arrow
      @click-left="$router.push('/mine')"
    ></van-nav-bar>
    <van-form @submit="onSubmit">
      <van-cell-group inset>
        <van-field
          v-model="old_password"
          name="old_password"
          label="原密码"
          placeholder="原密码"
        />
        <van-field
          v-model="new_password"
          type="password"
          name="new_password"
          label="新密码"
          placeholder="新密码"
        />
        <van-field
          v-model="confirm_new_password"
          type="password"
          name="confirm_new_password"
          label="确认新密码"
          placeholder="确认新密码"
        />
      </van-cell-group>
      <div style="margin: 16px">
        <van-button round block color="#ffcc33" type="primary" native-type="submit">
          确认修改
        </van-button>
      </div>
    </van-form>
  </div>
</template>

<script>
import globalConfig from '../../../globalConfig.vue';
import { ref } from 'vue';
import { Toast } from 'vant';
export default {
  data() {
    return {
      old_password: "",
      new_password: "",
      confirm_new_password: "",
    };
  },
  methods: {
    onSubmit(values) {
      console.log(values);
      console.log(values.old_password);
      console.log(values.new_password);
      console.log(values.confirm_new_password);
      if (values.new_password == values.confirm_new_password) {
        this.$axios({
          methods: "post",
          url: globalConfig.base_url+`/deliveryServer/updatepassword.php?username=${sessionStorage.getItem('username')}&old_password=${values.old_password}&new_password=${values.new_password}`,
        }).then((res) => {
          console.log(res);
          // if(res.code == 1001)
          // {
          Toast.fail(res.msg);
          // }
        }).catch((error) => {
          console.log(error);
        })
      } else {
        Toast.fail("两次新密码不一致！")
      }


      // if(values.old_password == )
    },
  },
  // brforeUpdate() {
  //   sessionStorage.getItem('username');
  // }
}
</script>

<style lang="sass" scoped>
</style>