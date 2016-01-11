<?php
/**
 * Created by PhpStorm.
 * User: saika
 * Date: 31/12/2015
 * Time: 15:00
 */


class helper{

    public function test()
    {
        echo "hello world";
        return true;
    }

    /**
     *
     * @param string $sku
     * @param bool $returnArray
     * @return mixed
     */
    public static function returnPrefix($sku, $returnArray = false)
    {
        $skuParts = explode("-", $sku);
        $prefix = '';
        $category = $skuParts[count($skuParts) - 2];
        $design = $skuParts[count($skuParts) - 1];
        for ($i = 0; $i < count($skuParts) - 2; $i ++){
            $prefix .= $skuParts[$i] . "-";
        }
        $prefix = substr($prefix, 0, strlen($prefix) - 1 );
        if ($returnArray == false)
            return $prefix;
        else
            return array($prefix, $category, $design);
    }


    /**
     * @param mixed $to
     * @param string $subject
     * @param string $body
     * @return bool
     * @throws phpmailerException
     */
    public static function sendSimpleMail($to, $subject, $body)
    {

        $mail = new PHPMailer;
        $mail->setFrom('it@virano.com', 'Saikaze/Helper');

        if (is_array($to))
            foreach($to as $address)
                $mail->addAddress($address);
        else
            $mail->addAddress($to);

        $mail->addReplyTo('it@virano.com');
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if(!$mail->send())
            return false;
        else
            return true;
    }


}