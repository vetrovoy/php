AddEventHandler("sale", "OnOrderNewSendEmail", "bxModifySaleMails");
//-- Собственно обработчик события
function bxModifySaleMails($orderID, &$eventName, &$arFields)
{
	$arOrder = CSaleOrder::GetByID($orderID);
	//-- получаем телефоны и адрес
	$order_props = CSaleOrderPropsValue::GetOrderProps($orderID);
	$phone = "";
	$name = "";
	$address = '';




	while ($arProps = $order_props->Fetch()) {
		if ($arProps["CODE"] == "PHONE") {
			$phone = htmlspecialchars($arProps["VALUE"]);
		}
		if ($arProps["CODE"] == "NAME") {
			$name = htmlspecialchars($arProps["VALUE"]);
		}

		if($arProps['Адрес доставки']) {
			$address = htmlspecialchars($arProps["VALUE"]);
		}

		// if ($arProps["CODE"] == "NAME") {
		// 	$address = htmlspecialchars($arProps["VALUE"]);
		// }

		//-- получаем название службы доставки
		$arDeliv = CSaleDelivery::GetByID($arOrder["DELIVERY_ID"]);
		$delivery_name = "";
		$delivery_desc = "";
		if ($arDeliv) {
			$delivery_name = $arDeliv["NAME"];
			$delivery_desc = $arDeliv["DESCRIPTION"];
		}
		//-- получаем название платежной системы
		$arPaySystem = CSalePaySystem::GetByID($arOrder["PAY_SYSTEM_ID"]);
		$pay_system_name = "";
		$pay_system_desc = "";
		if ($arPaySystem) {
			$pay_system_name = $arPaySystem["NAME"];
			$pay_system_desc = $arPaySystem["DESCRIPTION"];
		}
	}

	//-- добавляем новые поля в массив результатов
	$arFields["ORDER_DESCRIPTION"] = $arOrder["USER_DESCRIPTION"];
	$arFields["PHONE"] =  $phone;
	$arFields["NAME"] = $name;
	$arFields['ADDRESS'] = $address;

	$arFields["DELIVERY_NAME"] =  $delivery_name . " " . $delivery_desc;
	$arFields["PAY_SYSTEM_NAME"] =  $pay_system_name . " " . $pay_system_desc;

}
