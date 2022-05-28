<template>
    <div>
        icon
    </div>
<van-uploader :after-read="afterRead" />


</template>

<script>
import { ref } from 'vue';

export default {
  setup() {
    const afterRead = (file) => {
      // 此时可以自行将文件上传至服务器
      console.log(file);
      console.log(file.content);
      console.log(file.file);
    };

    return {
      afterRead,
    };
  },
};


</script>

<style lang="sass" scoped>

</style>