<?php

namespace Rouda\Docker\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Rouda\Docker\Api\Runtime\Normalizer\CheckArray;
use Rouda\Docker\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\HttpKernel\Kernel;
if (!class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class ServiceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\Service';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\Service';
        }
        public function denormalize(mixed $data, string $type, string $format = null, array $context = []) : mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\Service();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('ID', $data) && $data['ID'] !== null) {
                $object->setID($data['ID']);
            }
            elseif (\array_key_exists('ID', $data) && $data['ID'] === null) {
                $object->setID(null);
            }
            if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
                $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Rouda\\Docker\\Api\\Model\\ObjectVersion', 'json', $context));
            }
            elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
                $object->setVersion(null);
            }
            if (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] !== null) {
                $object->setCreatedAt($data['CreatedAt']);
            }
            elseif (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] === null) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] !== null) {
                $object->setUpdatedAt($data['UpdatedAt']);
            }
            elseif (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] === null) {
                $object->setUpdatedAt(null);
            }
            if (\array_key_exists('Spec', $data) && $data['Spec'] !== null) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Rouda\\Docker\\Api\\Model\\ServiceSpec', 'json', $context));
            }
            elseif (\array_key_exists('Spec', $data) && $data['Spec'] === null) {
                $object->setSpec(null);
            }
            if (\array_key_exists('Endpoint', $data) && $data['Endpoint'] !== null) {
                $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], 'Rouda\\Docker\\Api\\Model\\ServiceEndpoint', 'json', $context));
            }
            elseif (\array_key_exists('Endpoint', $data) && $data['Endpoint'] === null) {
                $object->setEndpoint(null);
            }
            if (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] !== null) {
                $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], 'Rouda\\Docker\\Api\\Model\\ServiceUpdateStatus', 'json', $context));
            }
            elseif (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] === null) {
                $object->setUpdateStatus(null);
            }
            if (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] !== null) {
                $object->setServiceStatus($this->denormalizer->denormalize($data['ServiceStatus'], 'Rouda\\Docker\\Api\\Model\\ServiceServiceStatus', 'json', $context));
            }
            elseif (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] === null) {
                $object->setServiceStatus(null);
            }
            if (\array_key_exists('JobStatus', $data) && $data['JobStatus'] !== null) {
                $object->setJobStatus($this->denormalizer->denormalize($data['JobStatus'], 'Rouda\\Docker\\Api\\Model\\ServiceJobStatus', 'json', $context));
            }
            elseif (\array_key_exists('JobStatus', $data) && $data['JobStatus'] === null) {
                $object->setJobStatus(null);
            }
            return $object;
        }
        public function normalize(mixed $object, string $format = null, array $context = []) : array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('iD') && null !== $object->getID()) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('version') && null !== $object->getVersion()) {
                $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
            }
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
                $data['UpdatedAt'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('spec') && null !== $object->getSpec()) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('endpoint') && null !== $object->getEndpoint()) {
                $data['Endpoint'] = $this->normalizer->normalize($object->getEndpoint(), 'json', $context);
            }
            if ($object->isInitialized('updateStatus') && null !== $object->getUpdateStatus()) {
                $data['UpdateStatus'] = $this->normalizer->normalize($object->getUpdateStatus(), 'json', $context);
            }
            if ($object->isInitialized('serviceStatus') && null !== $object->getServiceStatus()) {
                $data['ServiceStatus'] = $this->normalizer->normalize($object->getServiceStatus(), 'json', $context);
            }
            if ($object->isInitialized('jobStatus') && null !== $object->getJobStatus()) {
                $data['JobStatus'] = $this->normalizer->normalize($object->getJobStatus(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\Service' => false];
        }
    }
} else {
    class ServiceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;
        public function supportsDenormalization($data, $type, string $format = null, array $context = []) : bool
        {
            return $type === 'Rouda\\Docker\\Api\\Model\\Service';
        }
        public function supportsNormalization(mixed $data, string $format = null, array $context = []) : bool
        {
            return is_object($data) && get_class($data) === 'Rouda\\Docker\\Api\\Model\\Service';
        }
        /**
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Rouda\Docker\Api\Model\Service();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('ID', $data) && $data['ID'] !== null) {
                $object->setID($data['ID']);
            }
            elseif (\array_key_exists('ID', $data) && $data['ID'] === null) {
                $object->setID(null);
            }
            if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
                $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Rouda\\Docker\\Api\\Model\\ObjectVersion', 'json', $context));
            }
            elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
                $object->setVersion(null);
            }
            if (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] !== null) {
                $object->setCreatedAt($data['CreatedAt']);
            }
            elseif (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] === null) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] !== null) {
                $object->setUpdatedAt($data['UpdatedAt']);
            }
            elseif (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] === null) {
                $object->setUpdatedAt(null);
            }
            if (\array_key_exists('Spec', $data) && $data['Spec'] !== null) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Rouda\\Docker\\Api\\Model\\ServiceSpec', 'json', $context));
            }
            elseif (\array_key_exists('Spec', $data) && $data['Spec'] === null) {
                $object->setSpec(null);
            }
            if (\array_key_exists('Endpoint', $data) && $data['Endpoint'] !== null) {
                $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], 'Rouda\\Docker\\Api\\Model\\ServiceEndpoint', 'json', $context));
            }
            elseif (\array_key_exists('Endpoint', $data) && $data['Endpoint'] === null) {
                $object->setEndpoint(null);
            }
            if (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] !== null) {
                $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], 'Rouda\\Docker\\Api\\Model\\ServiceUpdateStatus', 'json', $context));
            }
            elseif (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] === null) {
                $object->setUpdateStatus(null);
            }
            if (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] !== null) {
                $object->setServiceStatus($this->denormalizer->denormalize($data['ServiceStatus'], 'Rouda\\Docker\\Api\\Model\\ServiceServiceStatus', 'json', $context));
            }
            elseif (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] === null) {
                $object->setServiceStatus(null);
            }
            if (\array_key_exists('JobStatus', $data) && $data['JobStatus'] !== null) {
                $object->setJobStatus($this->denormalizer->denormalize($data['JobStatus'], 'Rouda\\Docker\\Api\\Model\\ServiceJobStatus', 'json', $context));
            }
            elseif (\array_key_exists('JobStatus', $data) && $data['JobStatus'] === null) {
                $object->setJobStatus(null);
            }
            return $object;
        }
        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('iD') && null !== $object->getID()) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('version') && null !== $object->getVersion()) {
                $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
            }
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
                $data['UpdatedAt'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('spec') && null !== $object->getSpec()) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('endpoint') && null !== $object->getEndpoint()) {
                $data['Endpoint'] = $this->normalizer->normalize($object->getEndpoint(), 'json', $context);
            }
            if ($object->isInitialized('updateStatus') && null !== $object->getUpdateStatus()) {
                $data['UpdateStatus'] = $this->normalizer->normalize($object->getUpdateStatus(), 'json', $context);
            }
            if ($object->isInitialized('serviceStatus') && null !== $object->getServiceStatus()) {
                $data['ServiceStatus'] = $this->normalizer->normalize($object->getServiceStatus(), 'json', $context);
            }
            if ($object->isInitialized('jobStatus') && null !== $object->getJobStatus()) {
                $data['JobStatus'] = $this->normalizer->normalize($object->getJobStatus(), 'json', $context);
            }
            return $data;
        }
        public function getSupportedTypes(?string $format = null) : array
        {
            return ['Rouda\\Docker\\Api\\Model\\Service' => false];
        }
    }
}