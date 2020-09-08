<template>
  <div class="container">
    <div>
      <h1>
        {{ token }}
      </h1>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

import { messaging } from '@/plugins/firebase'

export default Vue.extend({
  async asyncData () {
    try {
      await messaging.requestPermission()
      const currentToken = await messaging.getToken()
      if (currentToken) {
        return { token: currentToken }
      }
    } catch (err) {
      // eslint-disable-next-line no-console
      console.error(err)
    }
  },
  data () {
    return {
      token: ''
    }
  },
  created () {
    messaging.onTokenRefresh(async () => {
      try {
        await messaging.requestPermission()
        const currentToken = await messaging.getToken()
        if (currentToken) {
          this.token = currentToken
        }
      } catch (err) {
        // eslint-disable-next-line no-console
        console.error(err)
      }
    })
  }
})
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
</style>
