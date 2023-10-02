 <?php

    function subNetGen()
    {
        class SubnetGenarator
        {
            function __construct($ip, $subnetNumber)
            {
                $range  = [1, 2, 4, 8, 16, 32, 64, 128, 256];
                $this->determinant  = [
                    'subnet' => $range,
                    'host'  => array_reverse($range),
                    'subnetMask' => [24, 25, 26, 27, 28, 29, 30, 31, 32]
                ];
                $this->subnetNumber  = $subnetNumber;
                $this->ip  = $ip;
            }

            private function getIp()
            {
                return $this->ip;
            }
            private function getSubnetNmber()
            {
                return  $this->subnetNumber;
            }
            private function getDeterminant()
            {
                $maxNmberOfSubnetParam  = [];

                for ($i = 0; $i < sizeof($this->determinant['subnet']); $i++) {
                    if ($this->determinant['subnet'][$i] >= $this->subnetNumber) {
                        //   $maxNmberOfSubnet  = $this->determinant['subnet'][$i];
                        $maxNmberOfSubnetParam  = [
                            'subnetNum' => $this->determinant['subnet'][$i],
                            'hostNum' => $this->determinant['host'][$i],
                            'mask' => $this->determinant['subnetMask'][$i],
                        ];
                        break;
                    }
                }

                return ['maxSbnet' => $maxNmberOfSubnetParam, 'reqiredSubnet' => $this->subnetNumber];
            }

            private function validateIp()
            {
                $ips_8_bit  = explode('.', $this->getIp());
                if (sizeof($ips_8_bit) > 4) {
                    throw new Exception("Ipv4 is more than 23 bit; Ipv4 is required");
                }
                foreach ($ips_8_bit as $byte_8) {
                    if ((int)$byte_8 > 255 || (int)$byte_8 < 0) {
                        throw new Exception("Ipv4 out of range. The byte is $byte_8");
                    }
                }
                return true;
            }

            public function getSubnetsIpsFor()
            {
                $ips_8_bit  = explode('.', $this->getIp());
                //host id number (got from nmber of subnet table) add to last byte of the ip
                if ($this->validateIp()) {
                    $res  = [];
                    for ($i = 0; $i < $this->getDeterminant()['maxSbnet']['subnetNum']; $i++) {
                        $byte_8_1  = (int)$ips_8_bit[0];
                        $byte_8_2  = (int)$ips_8_bit[1];
                        $byte_8_3  = (int)$ips_8_bit[2];
                        $byte_8_4  = (int)$ips_8_bit[3];
                        $incr  =  $i * $this->getDeterminant()['maxSbnet']['hostNum'];
                        $borIncr =  $incr + $this->getDeterminant()['maxSbnet']['hostNum'];
                        $last_byte  = $byte_8_4 + $incr;
                        $last_byte_border = ($last_byte - 1) + $borIncr;

                        if ($last_byte > 225) {
                            $byte_8_3++;
                            $last_byte = $last_byte % 225;
                        }

                        $byte_8_3_border  = $byte_8_3;
                        if ($last_byte_border > 225) {
                            $byte_8_3_border++;
                            $last_byte_border = $last_byte_border % 225;
                        }

                        //////////////////////////////////////////////////////
                        if ($byte_8_3 > 255) {
                            $byte_8_3  =  $byte_8_3 % 225;
                            $byte_8_2 += 1;
                        }
                        $byte_8_2_border  = $byte_8_2;
                        if ($byte_8_3_border > 255) {
                            $byte_8_3_border =  $byte_8_2_border % 225;
                            $byte_8_2_border += 1;
                        }
                        $ip_gen  = $byte_8_1 . '.' . $byte_8_2 . '.' . $byte_8_3 . '.' . $last_byte;
                        $ip_gen_border  = $byte_8_1 . '.' . $byte_8_2_border . '.' . $byte_8_3_border . '.' . $last_byte_border;
                        $host_id_range_max  = $byte_8_1 . '.' . $byte_8_2_border . '.' . $byte_8_3_border . '.' . ($last_byte_border - 1);
                        $host_id_range_min  = $byte_8_1 . '.' . $byte_8_2 . '.' . $byte_8_3 . '.' . ($last_byte + 1);
                        $one_res  = [
                            'ip' => $ip_gen,
                            'border_gateway' => $ip_gen_border,
                            'subnet_mask' => '/' . $this->getDeterminant()['maxSbnet']['mask'],
                            'host_id_range' =>  $host_id_range_min . " - " . $host_id_range_max
                        ];
                        $res[$i] =  $one_res;
                    }
                    return $res;
                }
            }
        }

        $ips  = new SubnetGenarator('192.168.245.1', 5);
        print_r($ips->getSubnetsIpsFor());
    }
    subNetGen();
