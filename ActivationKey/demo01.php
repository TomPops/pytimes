<?php
//代码依赖于通过COM扩展提供的 com_create_guid 函数。确保你的PHP环境已经正确配置并启用了COM组件扩展
function generateActivationKey() {
    // 生成UUID版本 4
    $uuid = com_create_guid();

    // 移除横杠并转换为大写
    $activationKey = str_replace('-', '', strtoupper($uuid));

    return $activationKey;
}

// 生成激活密钥
$activationKey = generateActivationKey();
echo $activationKey;
?>
