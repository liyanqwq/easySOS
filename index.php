<?php
    session_start();
    $_SESSION['token'] = bin2hex(random_bytes(32));
?>
<html lang="zh-cmn-Hans">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
    />
    <meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="LiYan" />

    <!-- CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
      integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link
      rel="shortcut icon"
      href="https://img-cdn.haozi.xyz/2021/07/22/2f6f826e6094162d8996ec7b71747a4b.jpg"
    />
    <title>紧急求助系统 - 对岸科技（北京）有限公司</title>
  </head>
  <body>
    <div class="app-main">
      <div class="mdui-card" id="app-form-card">
        <div class="mdui-card-header">
          <img
            class="mdui-card-header-avatar"
            src="https://img-cdn.haozi.xyz/2021/07/22/2f6f826e6094162d8996ec7b71747a4b.jpg"
          />
          <div class="mdui-card-header-title">紧急求助</div>
          <div class="mdui-card-header-subtitle">系统开放正常使用，我们将第一时间回应。</div>
        </div>
        <div class="mdui-card-content">
          <form id="sos-form" method="post">
              <input name="csrf-token" value="<?=$_SESSION['token']?>" type="hidden"/>
            <div class="mdui-textfield">
              <label class="mdui-textfield-label">姓名</label>
              <input class="mdui-textfield-input" name="name" required />
            </div>
            <div class="mdui-textfield">
              <label class="mdui-textfield-label">联系方式</label>
              <input class="mdui-textfield-input" name="contact" required />
            </div>
            <div class="mdui-textfield">
              <label class="mdui-textfield-label">留言</label>
              <textarea
                class="mdui-textfield-input"
                name="content"
                required
              ></textarea>
            </div>
            <button
              class="mdui-btn mdui-shadow-0 mdui-btn-raised mdui-ripple"
              type="submit"
            >
              提交
            </button>
          </form>
        </div>
      </div>
      <footer>
        <a href="//github.com/liyanqwq">LiYan</a> |
        <a href="//beian.miit.gov.cn">粤ICP备2021010728号</a>
      </footer>
    </div>
    <div class="bg-overlay"></div>
    <!-- JavaScript -->
    <script
      src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
      integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
