resource "aws_subnet" "private_us_east_1a" {
  vpc_id            = aws_vpc.abp_main_vpc.id
  cidr_block        = "10.0.0.0/19"
  availability_zone = "us_east_1a"

  tags = {
    Name                               = "sub"
    kubernates.io / role / internal_lb = "1"
    kubernates.io / cluster / demo     = "owned"

  }


}


resource "aws_subnet" "private_us_east_1b" {
  vpc_id            = aws_vpc.abp_main_vpc.id
  cidr_block        = "10.0.32.0/19"
  availability_zone = "us_east_1b"

  tags = {
    Name                               = "sub_b"
    kubernates.io / role / internal_lb = "1"
    kubernates.io / cluster / demo     = "owned"

  }


}


resource "aws_subnet" "public_us_east_1b" {
  vpc_id            = aws_vpc.abp_main_vpc.id
  cidr_block        = "10.0.96.0/19"
  availability_zone = "us_east_1b"

  tags = {
    Name                               = "pub_sub_b"
    kubernates.io / role / internal_lb = "1"
    kubernates.io / cluster / demo     = "owned"

  }


}

